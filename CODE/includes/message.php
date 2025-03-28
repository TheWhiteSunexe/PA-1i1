 <?php
    if (isset($_GET['message']) && !empty($_GET['message'])) {
        echo '
        <div class="alert alert-' . htmlspecialchars($_GET['type']) . ' alert-dismissible fade show" role="alert">' . htmlspecialchars($_GET['message']) . '
        <button style="width: 49px!important; height: 60px!important;box-sizing: border-box!important; "type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        '; // protection contre XSS
    }
    ?>