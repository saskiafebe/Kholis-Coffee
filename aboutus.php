<?php
include "connect.php";
$query = mysqli_query($conn, "SELECT * FROM forum");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="container-expand-lg">
    <img src="img/banner.png" class="img-fluid">
</div>
<section id="contact" style="background-color: #DFB78C;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mt-5 mb-5">
                <form class="needs-validation" novalidate action="prosescomment.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <input class="mb-2" type="text" name="nama" placeholder="Name" style="font-size: medium; border-radius: 8px;">
                        <textarea name="comment" cols="45" rows="5" placeholder="Comment" style="font-size: medium; border-radius: 8px;"></textarea>
                    </div>
                    <div>
                        <button type="submit" value="12345" name="input_comment_validate" class="btn btn-md text-light" style="background-color: #49281A; border: none;"></a>Send</button>
                        <button type="submit" class="btn btn-md text-light" style="background-color: #49281A; border: none;"></a>Cancel</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8 mt-5 mb-5">
                <h1 class="text-center">FORUM</h1>
                <table class="table table-hover">

                    <tbody>
                        <?php
                        $no = 1;
                        if (empty($result)) {
                            echo "";
                        } else {
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td width="10px"><?php echo $no++ ?></td>
                                    <td><a class="text-black" style="text-decoration:none"><?php echo $row['nama']; ?>: </a> <a class="text-white" style="text-decoration: none;"><?php echo $row['comment']; ?></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>