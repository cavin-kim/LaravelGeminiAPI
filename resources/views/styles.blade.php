<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    #chat-container {
        width: 400px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    #chatResponse {
        flex-grow: 1;
        overflow-y: auto;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        height: 300px;
        font-size: 14px;
    }

    .message {
        margin-bottom: 10px;
    }

    .user-message {
        text-align: right;
        color: blue;
    }

    .bot-message {
        text-align: left;
        color: green;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input[type="text"] {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    button {
        padding: 10px 20px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* Progress Indicator Styles */
    .progress-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 5px;
        width: 100%;
        background-color: #ddd;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        width: 0;
        background-color: #007bff;
        border-radius: 5px;
        position: absolute;
        animation: snake-animation 1.5s linear infinite;
    }

    @keyframes snake-animation {
        0% {
            transform: translateX(-100%);
        }

        25% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(100%);
        }

        75% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .hidden {
        display: none;
    }
</style>