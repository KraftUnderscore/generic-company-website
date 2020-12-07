<?php

function create_projects_list_content($email)
{
    return '
        <h2>Co dzisiaj zamówisz, ' . $email . '?</h2>
        <article class="list_item">
            <a href="index.php?page=app&project=Android">
                <img src="assets/android-logo.png" alt="android logo" width="30px" height="30px">
                <p class="list_item_title">
                    Android Application
                </p>
            </a>
        </article>
        
        <article class="list_item">
            <a href="index.php?page=app&project=Web">
                <img src="assets/www-logo.png" alt="www logo" width="30px" height="30px">
                <p class="list_item_title">
                    Web Application
                </p>
            </a>
        </article>

        <article class="list_item">
            <a href="index.php?page=app&project=Swift">
                <img src="assets/swift-logo.png" alt="swift logo" width="30px" height="30px">
                <p class="list_item_title">
                    iOS Application
                </p>
            </a>
        </article>';
}
