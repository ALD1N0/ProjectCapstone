@extends('mainlayout')

@section('maincontent')

<style>
    /* Modal Styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #f0f0f0;
        width: 800px;
        height: 500px;
        max-height: 800px;
        border-radius: 20px;
        padding: 15px;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .modal-header {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .chat-box {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
        /* background-image: url('https://i.ibb.co/fx6X04v/whatsapp-bg.png'); Optional background */
        background-size: cover;
        border-radius: 10px;
    }

    .chat-message {
        background-color: #dcf8c6;
        padding: 8px 12px;
        margin: 5px 0;
        border-radius: 10px;
        max-width: 75%;
        word-wrap: break-word;
        align-self: flex-start;
    }

    .chat-message.user {
        background-color: #ffffff;
        align-self: flex-end;
    }

    .input-box {
        display: flex;
        margin-top: 10px;
    }

    .input-box input {
        flex: 1;
        padding: 8px;
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    .input-box button {
        margin-left: 10px;
        padding: 8px 12px;
        border: none;
        background-color: #4caf50;
        color: white;
        border-radius: 10px;
        cursor: pointer;
    }

    .close-btn {
        position: absolute;
        top: 8px;
        right: 12px;
        font-size: 18px;
        cursor: pointer;
    }
</style>

<div class="detail-container">
    <div class="left">
        <div class="image-preview">
            <img src="{{asset("foto/helm.jpeg")}}" alt="Helm KYT">
        </div>
        <div class="action-buttons">
            <button>Simpan</button>
            <button onclick="openModal()">Komentar</button>
            <button>Bagikan</button>
            <button class="back-button" onclick="history.back()">⬅ Kembali</button>
        </div>
    </div>

    <div class="right">
        <h2>Jual Helm KYT Cross</h2>
        <h3 style="color: red;">Rp. 500.000</h3>
        <h4>Deskripsi Produk</h4>
        <p>Helm KYT Cross, pemakaian 7 bulan, kondisi mulus seperti baru. Cocok untuk motor trail/adventure. Bonus kaca helm.</p>
        <h4>Alamat Toko</h4>
        <p>Boyolali</p>
        <h4>Penjual</h4>
        <p>Gemilang Abadi ⭐⭐⭐⭐ (4.0)</p>
    </div>
</div>

<!-- Modal Komentar -->
<div id="komentarModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">Komentar</div>
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <div class="chat-box" id="chatBox">
            <!-- Simulasi komentar -->
            <div class="chat-message">Helm e ijek lur?</div>
            <div class="chat-message user">ijek lur</div>
            <div class="chat-message">COD pojokan singosaren purun?</div>
            <div class="chat-message user">purun bolo...</div>
        </div>
        <div class="input-box">
            <input type="text" id="newComment" placeholder="Ketik pesan...">
            <button onclick="addComment()">Kirim</button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById("komentarModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("komentarModal").style.display = "none";
    }

    function addComment() {
        const input = document.getElementById("newComment");
        const chatBox = document.getElementById("chatBox");

        if (input.value.trim() !== "") {
            const message = document.createElement("div");
            message.className = "chat-message user";
            message.textContent = input.value;
            chatBox.appendChild(message);
            input.value = "";
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    }
</script>

@endsection