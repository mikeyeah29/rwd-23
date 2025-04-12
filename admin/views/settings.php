<style>

    .rwd-container {
        display: flex;
        margin-top: 20px;
        background: #fff;
        margin-right: 20px;
        border-radius: 4px;
        box-shadow: 0px 0px 7px #00000029;
        border: solid 1px #bcbcbc;
    }

    /* CSS for the vertical rwd-navigation */
    .rwd-navigation {
        width: 200px;
        background-color: #00407f;
        padding: 20px;
        top: 0;
        left: 0;
        bottom: 0;
    }

    .rwd-navigation ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .rwd-navigation li {
        margin-bottom: 10px;
    }

    .rwd-navigation a {
        text-decoration: none;
        color: #fff;
    }

    .content {
        padding: 20px;
    }

</style>

<div class="rwd-container">
    <div class="rwd-navigation">
       <?php include('inc/_nav.php'); ?>
    </div>
    <div class="content">

        <h1>Project Guava</h1>

        <?php // foreach ($sites as $site) { ?>

            <!-- <h2><?php // echo $site['name']; ?></h2> -->
            <!-- <a href="https://rwdstaging.co.uk/<?php // echo $site['slug']; ?>?id=H23jD58HW">Site Demo</a> -->
            <?php // RwdGuava::generateVisitorTable($site['slug']); ?>

        <?php // } ?>

    </div>
</div>
