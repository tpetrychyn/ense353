<?php 
include('header.php');

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location:login.php");
    die();
}

session_start();
require_once('secrets.php');

$conn = new mysqli(Secrets::SERVERNAME, Secrets::USERNAME, Secrets::PASSWORD, Secrets::DB);
$sql = "SELECT * FROM users";

$sub_names = array('Targaryen', 'Stark', 'Lannister');
?>

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Subscription</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result = $conn->query($sql)) {
                            /* fetch associative array */
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                                        <th scope="row">' . $row['id'] . '</th>
                                        <td>' . $row['email'] . '</td>
                                        <td>' . $row['username'] . '</td>
                                        <td>' . $row['password'] . '</td>
                                        <td>' . $sub_names[$row['subscription']] . '</td>
                                        <td style="padding-top:4px;">
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" onclick="setModal('.$row['id'].',\''.$row['username'].'\',\''.$row['password'].'\','.$row['subscription'].')"><i class="far fa-fw fa-edit"></i></button> 
                                            <button onclick="deleteUser('.$row['id'].')" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></td>
                                    </tr>';
                            }
                            /* free result set */
                            $result->free();
                        }
                    ?>
                    <tr>
                        <td>New</td>
                        <td><input type="email" class="form-control" id="newEmail" placeholder="Email"></td>
                        <td><input type="text" class="form-control" id="newUsername" placeholder="Username"></td>
                        <td><input type="text" class="form-control" id="newPassword" placeholder="Password"></td>
                        <td><select class="form-control" id="newSubscription">
                                <option value="0">Targaryen</option>
                                <option value="1">Stark</option>
                                <option value="2">Lannister</option>
                            </select>
                        </td>
                        <td><button class="btn btn-primary" onclick="createUser();"><i class="fa fa-fw fa-plus"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit user - <span id="userId"></span>: <span id="userName"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="userPassword">Password</label>
            <input type="text" class="form-control" id="userPassword" placeholder="password">
        </div>
        <div class="form-group">
            <label for="subscription">Subscription</label>
            <select class="form-control" id="subscription">
                <option value="0">Targaryen</option>
                <option value="1">Stark</option>
                <option value="2">Lannister</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateUser()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var deleteUser = function(userId) {
        $.post("admin_a.php", {
            delete: true,
            userId: userId
        },function( data ) {
            location.reload();
        });
    }

    function setModal(id, username, password, subscription) {
        $('#userId').text(id);
        $('#userName').text(username);
        $('#userPassword').attr('value', password);
        $('#subscription').val(subscription);
    }

    function updateUser() {
        var userId = $('#userId').text();
        var password = $('#userPassword').val();
        var subscription = $('#subscription').val();
        $.post("admin_a.php", {
            edit: true,
            userId: userId,
            password: password,
            subscription: subscription
        },function( data ) {
            location.reload();
        });
    }

    function createUser() {
        var email = $('#newEmail').val();
        var username = $('#newUsername').val();
        var password = $('#newPassword').val();
        var subscription = $('#newSubscription').val();
        $.post("admin_a.php", {
            create: true,
            email: email,
            username: username,
            password: password,
            subscription: subscription
        },function( data ) {
            location.reload();
        });
    }
</script>

<?php 
$conn->close();

include('footer.php'); 
?>