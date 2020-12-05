<?php

function create_project_summary_content($project, $start_date, $end_date, $description, $extras, $is_valid)
{
    $status = $is_valid ? '<p style="color:green;">true</p>' : '<p style="color:red;">false</p>';
    return '
        <h2>Summary</h2>

        <article class="project_summary">
            <div class="project_type">
                <header>Project type:</header>
                <p>' . $project . '</p>
            </div>
            <div class="project_schedule">
                <p>
                    Project start: ' . $start_date . ', and project end: ' . $end_date . '
                </p>
            </div>
            <div class="project_description">
                <header>Project description: </header>
                <p>' . $description . '</p>
            </div>
            <div class="extras">
                <header>Premium packages:</header>
                ' . $extras . '
            </div>
            <div class="project_evaluation">
                <header>Is project valid and saved?</header>
                ' . $status . '
            </div>
        </article>';
}
