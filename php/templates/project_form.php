<?php

function create_project_form_content($project)
{
    return '
        <h2>
            ' . $project . ' app form
        </h2>

        <form method="post" action="index.php?page=project_form_summary">
            <div>
                <input type="hidden" name="app_kind" value="' . $project . '">
            </div>
            <div>
                <p>Data rozpoczęcia projektu</p>
                <input type="date" name="project_start">
            </div>
            <div>
                <p>Data końca projektu</p>
                <input type="date" name="project_end">
            </div>
            <p>Opis projektu</p>
            <textarea name="description" rows="6" cols="36"></textarea>
            <p>Dodatkowe pakiety</p>
            <div class="extra_commodities">
                <input type="checkbox" name="formExtra[]" value="Secure+ package"/> Secure+ package<br/>
                <input type="checkbox" name="formExtra[]" value="Fast+ package"/> Fast+ package<br/>
                <input type="checkbox" name="formExtra[]" value="Style+ package"/> Style+ package<br/>
                <input type="checkbox" name="formExtra[]" value="Super+ package"/> Super+ package<br/>
            </div>
            <input type="submit" value="Submit">
        </form>';
}
