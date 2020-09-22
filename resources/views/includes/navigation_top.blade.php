<div class="menu_content">
    <p class="menu_link"><a href="{{route('post.index')}}" >Blog</a></p>
    <p class="menu_link"><a href="{{route('admin.index')}}">Admin</a></p>
    <p class="menu_link"><a href="{{route('photoalbum.index')}}" >Fotoalbum</a></p>
    
    <form method="get" enctype="multipart/form-data" name="zoek" action="https://www.ronald-designs.nl/babyblog/blog/zoek/?>" >
            <table class="searchform">
              <tr><td class='fields'>
                <input type="text" class='field' name="zoekterm" value="Zoeken op blog..." onfocus="this.value=''"  />
              </td></tr>
            </table>
    </form>
</div>
            
