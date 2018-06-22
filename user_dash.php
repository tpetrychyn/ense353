<?php

$sub = $_SESSION['user']['subscription'];

?>

<style>

.card-footer {
    height: 60px;
}

.card-footer .btn {
    float: right;
}

</style>

<div class="row">
    <div class="col">
        <h3 class="text-center my-3">Manage Your Subscription</h3>
        <div class="card-group col-8 m-auto">
            <div class="card">
                <img class="card-img-top" src="/img/t1.png" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">House Targaryen</h5>
                <p class="card-text">House Targaryen is a noble family of Valyrian descent who once ruled the Seven Kingdoms of Westeros.</p>
                </div>
                <div class="card-footer">
                    <form action="subscription_a.php" method="POST">
                        <input type="hidden" value="0" name="subscription"/>
                        <?php 
                            if ($sub == 0) echo '<div class="text-muted">Currently Subscribed.</div>';
                            else echo 'Free! <button name="submit" class="btn btn-btn btn-info">Select</button>' 
                        ?>
                    </form>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="/img/t2.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">House Stark</h5>
                    <p class="card-text">House Stark of Winterfell is one of the Great Houses of Westeros and the principal noble house of the north.</p>
                </div>
                <div class="card-footer">
                    <form action="subscription_a.php" method="POST">
                        <input type="hidden" value="1" name="subscription"/>
                        <?php 
                            if ($sub == 1) echo '<span class="text-muted">Currently Subscribed.</span>';
                            else echo '$4.99 per month <button name="submit" class="btn btn-info">Select</button>' 
                        ?>
                    </form>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="/img/t3.png" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">House Lannister</h5>
                <p class="card-text">House Lannister of Casterly Rock is one of the Great Houses of Seven Kingdoms, and the principal house of the westerlands.</p>
                </div>
                <div class="card-footer">
                    <form action="subscription_a.php" method="POST">
                        <input type="hidden" value="2" name="subscription"/>
                        <?php 
                            if ($sub == 2) echo '<span class="text-muted">Currently Subscribed.</span>';
                            else echo '$9.99 per month <button name="submit" class="btn btn-info lannister">Select</button>' 
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>