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
       <h1>Plugin Settings</h1>
       <section id="general">
           <h2>General Settings</h2>
           <!-- General settings form goes here -->
       </section>
       <section id="appearance">
           <h2>Appearance</h2>
           <!-- Appearance settings form goes here -->
       </section>
       <section id="notifications">
           <h2>Notifications</h2>
           <!-- Notifications settings form goes here -->
       </section>
       <section id="about">
           <h2>About</h2>
           <!-- About section goes here -->
       </section>
    </div>
</div>
