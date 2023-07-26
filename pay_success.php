<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .container{
        background-color: whitesmoke;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        margin-top: 65px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.25);
    }
</style>

    <main>
        <div class="container p-4">
            <h3 class="heading text-center">Payment Successful!</h3>
            <img class="image" src="" alt="Payment Successful">
            <h3 class="welcome">Thank You For Choosing Us</h3>
            <p class="text-center">
                An automated payment receipt will be sent to your registered email.
            </p>
        </div>
    </main>
