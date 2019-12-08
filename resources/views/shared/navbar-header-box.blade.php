<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse center" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-auto">
                @include('shared.navbar-politic')
                @include('shared.navbar-sport')
                @include('shared.navbar-tech')
                @include('shared.navbar-business')
                @include('shared.navbar-education')
                @include('shared.navbar-lifestyle')
                @include('shared.navbar-features')
            </ul>
        </div>
    </div>
</nav>