    <header class="bg-f5 header-top fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-12 flex-row">
                    <div class="input-group" id=search-input>
                        <div class="input-group-prepend">
                            <div class="input-group-text input-group-text-c">
                                <img src="<?php bloginfo('template_url') ?>/assets/img/search.png" alt="" class="search" onclick="checkSubmit(event)">
                            </div>
                        </div>
                        <input id="search" type="text" class="form-control form-control-c" placeholder="Buscar" style="padding-left: 2.6rem;" oninput="searchPosts(event)" onfocusout="searchFocusOut()" onfocus="cleanSearch()">
                        <div class="input-group-append hide" id="search-append">
                            <span class="input-group-text" style="margin-top: -0.25rem; cursor: pointer;" onclick="cleanSearch()">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <form method="get" action="">
                        <select onchange="this.form.submit()" name="order" id="orderSelect" class="form-select form-select-c" aria-label="Default select example">
                            <option value="recent">Más recientes</option>
                            <option value="older">Más Antiguos</option>
                            <option value="top">Más populares</option>
                            <option value="a-z">A-Z</option>
                            <option value="z-a">Z-A</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <script>
        function checkSubmit(e) {
            console.log("Searching for: " + e)
            if (e && e.keyCode == 13) {
                console.log("Searching for: " + e)
                //document.forms[0].submit();
            }
        }
    </script>