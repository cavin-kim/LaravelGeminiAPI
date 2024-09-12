<script>
    // Function to load messages from localStorage
        function loadMessages() {
            let messages = JSON.parse(localStorage.getItem('chatMessages')) || [];
            messages.forEach(msg => {
                let messageDiv = document.createElement('div');
                messageDiv.className = `message ${msg.type}-message`;
                messageDiv.innerText = msg.text;
                document.getElementById('chatResponse').appendChild(messageDiv);
            });
        }

        // Function to save messages to localStorage
        function saveMessage(type, text) {
            let messages = JSON.parse(localStorage.getItem('chatMessages')) || [];
            messages.push({ type: type, text: text });
            localStorage.setItem('chatMessages', JSON.stringify(messages));
        }

        // Load messages when the page loads
        document.addEventListener('DOMContentLoaded', loadMessages);

        document.getElementById('chatForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let message = document.getElementById('userMessage').value;
            let userMessageDiv = document.createElement('div');
            userMessageDiv.className = 'message user-message';
            userMessageDiv.innerText = message;
            document.getElementById('chatResponse').appendChild(userMessageDiv);

            // Save user message
            saveMessage('user', message);

            // Show progress indicator
            document.getElementById('progressIndicator').classList.remove('hidden');

            fetch('/chatbot', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: message
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Hide progress indicator
                    document.getElementById('progressIndicator').classList.add('hidden');

                    let botMessageDiv = document.createElement('div');
                    botMessageDiv.className = 'message bot-message';
                    botMessageDiv.innerText = data.message;
                    document.getElementById('chatResponse').appendChild(botMessageDiv);

                    // Save bot message
                    saveMessage('bot', data.message);

                    document.getElementById('userMessage').value = '';
                });
        });
</script>