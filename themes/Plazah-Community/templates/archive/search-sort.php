    <header class="bg-f5 header-top fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-12 flex-row">
                    <div class="input-group" id="search-input">

                        <div class="input-group-prepend">
                            <div class="input-group-text input-group-text-c">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="m13 19c4.4183 0 8-3.5817 8-8 0-4.41828-3.5817-8-8-8-4.41828 0-8 3.58172-8 8 0 1.8487.62708 3.551 1.68014 4.9056l-3.38725 3.3873c-.39052.3905-.39052 1.0237 0 1.4142.39053.3905 1.02369.3905 1.41422 0l3.38725-3.3872c1.35468 1.053 3.05694 1.6801 4.90564 1.6801zm0-2c-3.31371 0-6-2.6863-6-6 0-3.31371 2.68629-6 6-6 3.3137 0 6 2.68629 6 6 0 3.3137-2.6863 6-6 6z" fill="#747a7b" fill-rule="evenodd" />
                                </svg>
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