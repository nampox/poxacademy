<style>
    #chatButton {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 15px 25px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    #chatContainer {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 350px;
        height: 500px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        display: none;
        flex-direction: column;
    }

    .chat-header {
        padding: 15px;
        background-color: #007bff;
        color: white;
        border-radius: 10px 10px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #minimizeBtn {
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        font-size: 1.2em;
    }

    #chatMessages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        background-color: #f8f9fa;
    }

    .message {
        margin-bottom: 10px;
        padding: 8px 12px;
        border-radius: 15px;
        max-width: 80%;
    }

    .user-message {
        background-color: #007bff;
        color: white;
        margin-left: auto;
    }

    .bot-message {
        background-color: #e9ecef;
        color: black;
        margin-right: auto;
    }

    #inputGroup {
        padding: 15px;
        background-color: white;
        display: flex;
        gap: 10px;
        border-top: 1px solid #dee2e6;
    }

    #userInput {
        flex: 1;
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 20px;
        outline: none;
    }

    #sendBtn {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 20px;
        cursor: pointer;
    }
</style>
<button id="chatButton" onclick="toggleChat()">Chat</button>

<div id="chatContainer">
    <div class="chat-header">
        <span>Chat Assistant</span>
        <button id="minimizeBtn" onclick="toggleChat()">−</button>
    </div>
    <div id="chatMessages"></div>
    <div id="inputGroup">
        <input type="text" id="userInput" placeholder="Type your message...">
        <button id="sendBtn" onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
    const OPENROUTER_API_KEY = "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";
    const OPENROUTER_API_URL = "https://openrouter.ai/api/v1/chat/completions";
    function toggleChat() {
        const container = document.getElementById('chatContainer');
        const button = document.getElementById('chatButton');
        container.style.display = container.style.display === 'none' ? 'flex' : 'none';
        button.style.display = container.style.display === 'none' ? 'block' : 'none';
    }

    function appendMessage(message, isUser) {
        const chatMessages = document.getElementById('chatMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
        messageDiv.textContent = message;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    async function sendMessage() {
        const userInput = document.getElementById('userInput');
        const message = userInput.value.trim();
        let today = new Date();
        let formattedDate = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        let systemMessage = `Hôm nay là ngày ${formattedDate}. Bạn là Đỗ Quang Nam. Bạn sinh ngày 26/12/2002, hiện đang là sinh viên năm cuối tại Đại học Kinh tế Kỹ thuật Công nghiệp. Quê quán tại huyện Vũ Thư, tỉnh Thái Bình. Hiện bạn đang học tập và sinh sống tại Phùng Khoang - Hà Nội. Khi người dùng hỏi,hãy chỉ trả lời những câu hỏi liên quan đến Đỗ Quang Nam, và hãy trả lời như thể bạn thực sự là Đỗ Quang Nam. Nếu người dùng hỏi về thông tin khác không liên quan đến bạn hoặc Đỗ Quang Nam, hãy từ chối trả lời.`;
        if (!message) return;

        appendMessage(message, true);
        userInput.value = '';

        try {
            const response = await fetch(OPENROUTER_API_URL, {
                method: "POST",
                headers: {
                    "Authorization": `Bearer ${OPENROUTER_API_KEY}`,
                    "HTTP-Referer": window.location.href,
                    "X-Title": "Chatbot",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    "model": "deepseek/deepseek-chat:free",

                    "messages": [
                        {
                            "role": "system",
                            "content": systemMessage
                        },
                        {
                            "role": "user",
                            "content": message
                        }
                    ]
                })
            });

            const data = await response.json();
            const botResponse = data.choices[0].message.content;
            appendMessage(botResponse, false);
        } catch (error) {
            console.error("Error fetching response from OpenRouter API:", error);
            appendMessage("Sorry, I encountered an error. Please try again.", false);
        }
    }

    // Allow Enter key to send message
    document.getElementById('userInput').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
</script>
