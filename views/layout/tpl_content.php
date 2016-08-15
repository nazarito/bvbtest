<div class="container">
    <div class="content">
        <?php
            require_once 'views/layout/tpl_head.php';
            require_once 'views/layout/tpl_header.php';
            require_once 'views/' . $content . '.php';
            require_once 'views/layout/tpl_footer.php';
        ?>
    </div>
    <div class="content-locked"></div>
    <div class="left-menu menu">
        <ul>
            <li class="active" data-tabs="cats">
                Cats
            </li>
            <li data-tabs="dogs">
                Dogs
            </li>
            <li data-tabs="horses">
                Horses
            </li>
            <li data-tabs="contacts">
                Contact us
            </li>
        </ul>
    </div>
</div>



<div class="out-bg"></div>
<div class="help-modal">
    <div class="modal-header">Help modal</div>
    <div class="help-buttons">
        <div class="help-button">
            <a href="http://facebook.com#target" class="btn yes green-button">Yes</a>
        </div>
        <div class="help-button">
            <button class="btn no red-button">No</button>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo $this->url; ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $this->url; ?>assets/js/main.js"></script>