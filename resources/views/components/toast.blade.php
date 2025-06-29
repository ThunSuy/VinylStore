{{-- filepath: resources/views/components/toast.blade.php --}}
<div id="notice" class="toast-notice-container" style="position: fixed; top: 24px; right: 24px; z-index: 99999;"></div>

<style>
    #notice {
        position: fixed;
        top: 7vh;
        right: calc(0px + 3vw);
        z-index: 10;
    }

    #notice .container {
        width: 23vw;
        height: 80px;
        position: relative;
        margin-bottom: 10px;
        background-color: orange;
        border-radius: 5px;
        padding: 25px 50px 0px 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(10, 4, 4);
        font-size: 20px;
        animation: popup;
        animation-duration: 0.8s;
        font-family: "Dosis", sans-serif;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        /* display: none; */
    }

    #notice .slide {
        position: absolute;
        top: -7;
        left: 0;
        height: 5px;
        width: 100%;
        background-color: #007219;
    }

    #notice .fade {
        animation: fade;
        animation-duration: 0.8s;
    }

    #notice .slide {
        animation: slide;
        animation-duration: 2.6s;
        animation-delay: 0.8s;
    }

    #notice .cart-adding,
    #notice .favor-adding,
    #notice .favor-removing,
    #notice .cart-removing,
    #notice .order-removing {
        /* display: none; */
    }

    #notice .cart-adding i,
    #notice .favor-adding i,
    #notice .favor-removing i,
    #notice .cart-removing i,
    #notice .order-removing i {
        font-size: 25px;
        margin-right: 5px;
    }

    @keyframes popup {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }

        to {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    @keyframes fade {
        from {
            opacity: 1;
            transform: translateX(0px);
        }

        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }

    @keyframes slide {
        from {
            width: 100%;
        }

        to {
            width: 0;
        }
    }
</style>
