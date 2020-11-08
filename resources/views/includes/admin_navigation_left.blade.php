
<div class="admin-left-menu_container my-2">
    <div class="admin-left-menu" id="admin-left-menu" >
        <div class="menu-item p-3 my-2 btn btn-light <?php if(Request::is('admin/posts*')) echo " active" ?>" data-toggle="button" aria-pressed="false"><a href="{{route('admin.posts.index')}}">Posts</a></div>
        <div class="menu-item p-3 my-2 btn btn-light <?php if(Request::is('admin/photoalbum*')) echo " active" ?>" data-toggle="button" aria-pressed="false"><a href="{{route('admin.photoalbums.index')}}">Fotoalbum</a></div>
        <div class="menu-item p-3 my-2 btn btn-light <?php if(Request::is('admin/stats*')) echo " active" ?>" data-toggle="button" aria-pressed="false"><a href="{{route('admin.stats.index')}}">Statistieken</a></div>
        <div class="menu-item p-3 my-2 btn btn-light <?php if(Request::is('admin/security*')) echo " active" ?>" data-toggle="button" aria-pressed="false"><a href="{{route('admin.security.index')}}">Beveiliging</a></div>
        <div class="menu-item p-3 my-2 btn btn-light <?php if(Request::is('admin/settings*')) echo " active" ?>" data-toggle="button" aria-pressed="false"><a href="{{route('admin.settings.index')}}">Instellingen</a></div>
        <div class="menu-item p-3 my-2 btn btn-light <?php if(Request::is('admin/logs*')) echo " active" ?>" data-toggle="button" aria-pressed="false"><a href="{{route('admin.logs.index')}}">Logs</a></div>
    </div>
</div>