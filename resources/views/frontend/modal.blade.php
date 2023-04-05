<section>

    <div class="modal_status">
        <div class="modal_window">
            {{-- <div class="title">Hasil Pencarian</div> --}}
            <div class="row">
                <div class="col-lg-3">
                    <p class="text">Pelanggan</p>
                    <p class="font" id="customer"></p>
                </div>
                <div class="col-lg-3">
                    <p class="text">Tgl Transaksi</p>
                    <p class="font" id="tgl_transaksi"></p>
                </div>
                <div class="col-lg-3">
                    <p class="text">Status</p>
                    <p class="font" id="status_order"></p>
                </div>
            </div>
            <br />
            <button class="button btn-danger btn-block" onclick="close_dlgs()">Close</button>
        </div>
    </div>
</section>

<style>
    section {
        position: absolute;
        left: 510px;
        top: 150px;
        filter: drop-shadow(0px 10px 7px rgba(0, 0, 0, 0.25));
    }

    .modal_window>.title {
        font-size: 18px;
        font-weight: bold;
        color: black;
    }

    .text {
        color: white !important;
        font-weight: bold;
    }

    .font {
        color: white !important;
    }

    .modal_window {
        position: relative;
        width: 380px;
        padding: 20px;
        margin-top: 20px;
        background: rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .modal_status {
        display: none;
        position: center;
        width: 30px;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        border-radius: 5px;
    }

    .row {
        display: flex;
    }

    .col-lg-3 {
        margin-right: 50px;
    }

    .button {
        position: absolute;
        top: 110.5px;
        left: 352px;
        padding: 6px 15px;
        border: 2px solid #FB7B63;
        background-color: #FB7B63;
        border-radius: 5px;
        color: #fafafa;
    }
</style>
