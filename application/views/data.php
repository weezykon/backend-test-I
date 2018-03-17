<?php if(count($users) > 0){ ?>
    <table class="table table-responsive">
        <thead>
            <tr>
                <td>Tweet</td>
                <td>Name</td>
                <td>Username</td>
                <td>Bio</td>
                <td>Followers Count</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($users as $key => $value) {
            ?>
                <tr>
                    <td><?= $value['tweet']; ?></td>
                    <td><?= $value['user']['name']; ?></td>
                    <td><?= $value['user']['screen_name']; ?></td>
                    <td><?= $value['user']['description']; ?></td>
                    <td><?= $value['user']['followers_count']; ?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
<?php 
    }else{
        echo "<h3>No Data Available</h3>";
    }
?>