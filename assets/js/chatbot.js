function toggleChat() {
  const box = document.getElementById("chat-box");
  box.style.display = box.style.display === "none" ? "block" : "none";
}

function sendMessage() {
  const input = document.getElementById("userMessage");
  const message = input.value;
  if (!message.trim()) return;

  const messagesDiv = document.getElementById("chat-messages");
  messagesDiv.innerHTML += `<div><strong>You:</strong> ${message}</div>`;

  fetch("chatbot/process.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "message=" + encodeURIComponent(message)
  })
    .then(res => res.text())
    .then(reply => {
      messagesDiv.innerHTML += `<div><strong>Bot:</strong> ${reply}</div>`;
      input.value = "";
      messagesDiv.scrollTop = messagesDiv.scrollHeight;
    });
}
