<?php
    $page_footer = "
        <footer>
            Copyright &copy; 1999-" . date("Y") . " PiekarniaOprogramowania.com
        </footer>";

    $page_header = '
        <header>
            <h1>Piekarnia Oprogramowania</h1>

            <nav class="navbar">
                <a href="index.php">O nas</a>
                <a href="index.php?page=login">Panel klienta</a>
                <a href="index.php?page=app_list">Nasze wypieki</a>
            </nav>
        </header>';

    $main_page_content ='
        <section>
            <h2>Kim jesteśmy?</h2>

            <p>
                Jesteśmy dynamicznie rozwijającym się polskim start-upem. Weszliśmy pewnie na rynek w 2020 roku,
                kiedy inne firmy stawały na granicy przeżycia my wbiliśmy się w gospodarkę, przebijając na samą górę.
                W krótkim czasie staliśmy się najlepszym software housem w Polsce, a teraz pracujemy nad podbojem świata.
                Mamy za sobą setki utworzonych projektów - każdy ukończony w pełni z wymaganiami klientów, co najmniej
                na czas i po atrakcyjnej stawce. Nie ma drugiej takiej firmy jak my! Nie zwlekaj, nasza dostępność jest
                ograniczona. Nie pozwól, aby inni wyrwali Ci nas sprzed nosa. Skontaktuj się z nami już teraz!
            </p>
        </section>

        <section>
            <h2>Co mówią o nas klienci?</h2>

            <div class="comment">
                <h3>Microsoft</h3>
                <p>
                    Naprawdę świetna firma, wszystko zawsze na czas i
                    dokonane z najwyższą starannością. Polecamy serdecznie!!!
                </p>
            </div>

            <div class="comment">
                <h3>Google</h3>
                <p>
                    Szybko, sprawnie, nawet tanio jak za taką jakość wykonania.
                    Obsługa na najwyższym poziomie, zero problemów z kontaktem i
                    byli skłonni pomóc z każdym naszym dylematem. Polecamy.
                </p>
            </div>

            <div class="comment">
                <h3>Facebook</h3>
                <p>
                    Zastanawialiśmy się długo nad wyborem software house do naszego najnowszego projektu.
                    Natknęliśmy się na Piekarnię Oprogramowania i od razu wiedzieliśmy, że są to ludzie
                    których właśnie potrzebujemy. Nie myliliśmy się. Prace ruszyły błyskawicznie i zaraz
                    mieliśmy pierwsze prototypy. Co prawda developerzy nie zgadzali się na implementację
                    każdego naszego pomysłu (tłumaczyli się, że to narusza prywatność ludzi czy coś), ale
                    mimo to jesteśmy bardzo zadowoleni z ich pracy i polecamy wszystkim korzystanie z usług
                    tej firmy.
                </p>
            </div>

            <div class="comment">
                <h3>Reddit</h3>
                <p>
                    Chcieliśmy odświeżyć naszą stronę i rozpoczęliśmy poszukiwania na rynku software housów.
                    Wpadła nam w oko Piekarnia Oprogramowania - to jest po prostu genialna nazwa, musieliśmy
                    tutaj zajrzeć! Od razu zaparło nam dech w piersiach, kiedy ujrzeliśmy tę piękną stronę.
                    Ah, ten HTML tak ładnie zorganizowany. Jaki ten CSS jest piękny. A jaka dynamika strony
                    dzięki pomysłowemu zastosowaniu JS. Bez chwili namysłu skorzystaliśmy z pieca Piekarni i
                    nie moglibyśmy być bardziej zadowoleni.
                </p>
            </div>
        </section>

        <section>
            <h2>Kontakt</h2>
            <p>
                Jesteśmy do państwa dyspozycji 24/7<br>
                Telefon: 123 456 789<br>
                Email: piekarnia.oprogramowania@pieksy.pl
            </p>
        </section>';

    $login_page_content = '
        <div class="login">
            <h4>Logowanie</h4>
            <form method="post" action="index.php?page=login_form">
                <p>
                    Login:
                    <input type="email" name="email">
                </p>
                <p>
                    Hasło:
                    <input type="password" name="password">
                </p>
                <p>
                    <input type="submit" name="submit" value="Zaloguj">
                </p>
            </form>
        </div>';

    function generate_client_panel_content($email) {
        return '
        <h2>Witaj z powrotem, ' . $email . '!</h2>

        <div class="orders">
            <h3>Twoje zamówienia:</h3>
            <div>
                <ul>
                    <li>
                        <h4>Zamówienie 1</h4>
                        <p>Status zamówienia: w trakcie przygotowania</p>
                        <p>Opis zamówienia</p>
                    </li>
                    <li>
                        <h4>Zamówienie 2</h4>
                        <p>Status zamówienia: gotowe</p>
                        <p>Opis zamówienia</p>
                    </li>
                    <li>
                        <h4>Zamówienie 3</h4>
                        <p>Status zamówienia: odebrano</p>
                        <p>Opis zamówienia</p>
                    </li>
                </ul>
            </div>
        </div>
        ';
    }

    $incorrect_login_page_content = '
        <p class="error">NIEPOPRAWNE DANE LOGOWANIA</p>';

    $projects_list_page_content = '
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

    function generate_projects_form_content($project) {
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

    function generate_form_summary_content($project, $start_date, $end_date, $description, $extras, $is_valid) {
        $status = $is_valid?'<p style="color:green;">true</p>':'<p style="color:red;">false</p>';
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
                <p>'. $description . '</p>
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
