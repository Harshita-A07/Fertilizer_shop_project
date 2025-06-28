<div id="chatbot-container" style="position: fixed; bottom: 20px; right: 20px;">
  <button onclick="toggleChat()" style="background-color: #379683; color: white; border: none; border-radius: 50%; padding: 15px; font-size: 18px;">💬</button>
  <div id="chat-box" style="display: none; width: 300px; height: 400px; background-color: white; border: 1px solid #ccc; border-radius: 10px; padding: 10px; overflow-y: auto;">
    <h4>Chat with us</h4>
    <div id="chat-messages" style="height: 300px; overflow-y: scroll;"></div>
    <input type="text" id="userMessage" placeholder="Ask a question..." style="width: 80%;">
    <button onclick="sendMessage()">Send</button>
  </div>
</div>

<script src="assets/js/chatbot.js"></script>
