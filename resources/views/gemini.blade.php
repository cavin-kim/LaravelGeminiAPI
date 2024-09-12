<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatbot AI</title>
    @include('styles')
</head>

<body>
    <div id="chat-container">
        <div id="chatResponse"></div>
        <form id="chatForm">
            <input type="text" id="userMessage" placeholder="Type a message..." required>
            <button type="submit">Send</button>
            <div id="progressIndicator" class="progress-container hidden">
                <div class="progress-bar"></div>
            </div>
        </form>
    </div>

    @include('script')
</body>

</html>