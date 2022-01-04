<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Filter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
</head>

<body class="has-background-light" style="min-height: 100vh">
    <div class="is-hidden" id="template">
        <div class="panel-block">
            <div>
                <p class="has-text-weight-bold">Exercise</p>
                <p>Exercise 01</p>
            </div>
        </div>
    </div>

    <main class="container columns">
        <div class="section column is-half">
            <section class="panel is-primary has-background-white">
                <p class="panel-heading">Exercises</p>
                <form class="panel-block">
                    <div class="field has-addons" style="width: 100%">
                        <div class="control is-expanded">
                            <input type="search" class="input" />
                        </div>

                        <div class="control">
                            <button class="button is-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </form>

                <div id="exercises"></div>
            </section>
        </div>
    </main>

    <script src="<?= BASE_URL ?>/assets/js/script.js"></script>
</body>

</html>