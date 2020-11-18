<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{asset('admin/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li>
                    <a href="{{route('permission.index')}}"> <i class="menu-icon fa fa-laptop"></i>Permission</a>
                </li>
                <li>
                    <a href="{{route('role.index')}}"> <i class="menu-icon fa fa-laptop"></i>Role</a>
                </li>
                <li>
                    <a href="{{route('author.index')}}"> <i class="menu-icon fa fa-laptop"></i>Author</a>
                </li>
                <li>
                    <a href="{{route('category.index')}}"> <i class="menu-icon fa fa-laptop"></i>Category</a>
                </li>
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->
