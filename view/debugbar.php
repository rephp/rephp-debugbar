<div id="debugbar" style="position:fixed;bottom:0;right:0;font-size:12px;width:100%;z-index: 9999;">
    <div id="debugbar_tab" style="display:none;height: 300px;margin:0;background:#fff;">
        <div id="debugbar_tab_name" style="height:32px;padding: 10px 15px;border:1px solid #eee;font-size:14px">
            <?php
            $info['list_info'] = (array)$info['list_info'];
            foreach($info['list_info'] as $index=>$val){
            ?>
            <span style="padding-right:12px;height:30px;line-height:30px;display:inline-block;margin-right:3px;cursor:pointer; <?php if($index==0){ echo  'color:#999;'; }else{ echo 'color:#ccc;'; }?>"><?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?></span>
            <?php
            }
            ?>
        </div>
        <div id="debugbar_tab_body" style="overflow:auto;height:268px;padding:0;line-height: 24px">
                <?php
                foreach($info['list_info'] as $index=>$val){
                ?>
                    <div <?php if($index>0){ echo  ' style="display:none;"'; }else{ echo  ' style="display:block;"';}?> >
                        <ol style="padding: 0; margin:0">
                            <?php
                            if (is_array($val['data'])) {
                                foreach ($val['data'] as $vvv) {
                                    ?>
                                    <li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px"><?php echo htmlspecialchars($vvv, ENT_QUOTES); ?></li>
                             <?php
                                }
                            }
                            ?>
                        </ol>
                    </div>
                <?php
                }
                ?>
        </div>
    </div>
    <div id="debugbar_close" style="display:none;text-align:right;height:16px;position:absolute;top:15px;right:15px;cursor:pointer;"><img style="vertical-align:top;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAXVBMVEX/NQEAAAD/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQH/NQEAAABq5rz5AAAAHXRSTlMAAAEPgEg6hxbhRjjWkwTg1epXVkXk3untR5oFH4i1wn4AAAABYktHRAH/Ai3eAAAACXBIWXMAAABkAAAAZAAPlsXdAAAAB3RJTUUH5QMFCAIQ27GJLQAAAK1JREFUKM91ktkWwiAMBS+1u120G201//+bwqGQgMoTzHAguQAgA6DEgEO45UVkzKKsaiNzalphzPTeUT8ARUMjG8sf9JzsWe3I5uIzEBvJlTCCK7ctmMCtEIa58ldaswjuxGXWjbTnistfVqJ95oa4r41IH4lw9exaZCD61fMhM4hyEOkkOYh0/uWW5PA7NxWbsmMejHntrJLcm/MF1P2UfobifNuzhu/vY/Z/ACnHDlBkrDyEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIwLTA3LTE5VDAzOjM5OjE0KzAwOjAw/KctrAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMC0wNC0xNlQwNzozOTo0OCswMDowMO+/egUAAAAgdEVYdHNvZnR3YXJlAGh0dHBzOi8vaW1hZ2VtYWdpY2sub3JnvM8dnQAAAGN0RVh0c3ZnOmNvbW1lbnQAIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgzkiQCwAAABh0RVh0VGh1bWI6OkRvY3VtZW50OjpQYWdlcwAxp/+7LwAAABh0RVh0VGh1bWI6OkltYWdlOjpIZWlnaHQANDMzy35rogAAABd0RVh0VGh1bWI6OkltYWdlOjpXaWR0aAA0MzNYjzv/AAAAGXRFWHRUaHVtYjo6TWltZXR5cGUAaW1hZ2UvcG5nP7JWTgAAABd0RVh0VGh1bWI6Ok1UaW1lADE1ODcwMjI3ODg+ROnJAAAAEXRFWHRUaHVtYjo6U2l6ZQAyNTQwQumz7v4AAABadEVYdFRodW1iOjpVUkkAZmlsZTovLy9kYXRhL3d3d3Jvb3Qvd3d3LmVhc3lpY29uLm5ldC9jZG4taW1nLmVhc3lpY29uLmNuL2ZpbGVzLzEyNC8xMjQ5MTExLnBuZzobaBsAAAAASUVORK5CYII=" /></div>
</div>

<div id="debugbar_open" style="height:30px;float:right;text-align:right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;">
    <div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px"><?php echo $info['other_info']['runtime'];?></div>
    <img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAQAAAD/5HvMAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAHdElNRQflAwUIAAoU5RLVAAACDklEQVRo3u2XTUhUURSAv8lxUEcYiRwQw0UJCgkxFIQEaRhauSsXrVrXTih3GhVEiyhaubBV0cLFQIW1KBRaRFgSughCdJGCRC38i3EYmZnXwmmYmfcuvsH37n2L853dvY/zPu499w8EQRAEQRCEQBHyJEeUsLIvxw5Z98nC7j9V0swLTlPj2JdnntssePAX19Ryj20sx8gzR48ns1AFffxU6nzlvF4ZaOE9WYXOF/p069Ryn02lzgXdOnCRJYXOLP36ddp4Sz44OhHushUcHRhkUVE7RnSO8So4pQx1jPHXcd/RvtD3uOwwXXnm9G+De7STtOlkmeWsF8mrP1wbGGLQ1mqRZYgrZW0haphmmrS/4zPAsmM5p2yRJslJv4/W4w7TpYo3JDjkr04jt9h1JZNjkk7/Lx5nmGeTjYrI2HQyvKTdbxmAMDGaKiLO64pRS/GMVh06zvSzWqazzThxczpRkmXjs85TYuZ04BprJTp/eEi9SZ3DTJEr6qwxStSkDtzkd1FnhWEiZnWO8qGos8wNT954B2KE9YLOd677vSfvTwcfCzrfuKr7MWgnxJ3CFe0TlxTPaK2c4jMWFjP0mp8sqOMBGSze0R0EHTjHAhZJEuZrByDGY3JMcsK0yH8G+MFzPdcLN8R5xARtfqWvfnftYosn/DI6KCU00sER0xKlhIKxzAVBEARBEARt/ANDylGF3EpI/AAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMC0wNy0xOVQwMzozOToxNyswMDowMM1PNzEAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDEtMDhUMTg6NDA6MjUrMDA6MDBmdtPnAAAAIHRFWHRzb2Z0d2FyZQBodHRwczovL2ltYWdlbWFnaWNrLm9yZ7zPHZ0AAAAYdEVYdFRodW1iOjpEb2N1bWVudDo6UGFnZXMAMaf/uy8AAAAXdEVYdFRodW1iOjpJbWFnZTo6SGVpZ2h0ADc2S/X56QAAABZ0RVh0VGh1bWI6OkltYWdlOjpXaWR0aAA3NrNaOWQAAAAZdEVYdFRodW1iOjpNaW1ldHlwZQBpbWFnZS9wbmc/slZOAAAAF3RFWHRUaHVtYjo6TVRpbWUAMTU0Njk3MjgyNa9x+oAAAAAQdEVYdFRodW1iOjpTaXplADUxMkKtrpyRAAAAWnRFWHRUaHVtYjo6VVJJAGZpbGU6Ly8vZGF0YS93d3dyb290L3d3dy5lYXN5aWNvbi5uZXQvY2RuLWltZy5lYXN5aWNvbi5jbi9maWxlcy8xMTEvMTExNjI5Ni5wbmdMTlbTAAAAAElFTkSuQmCC">
</div>

<script type="text/javascript">
    (function(){
        var tab_tit  = document.getElementById('debugbar_tab_name').getElementsByTagName('span');
        var tab_cont = document.getElementById('debugbar_tab_body').getElementsByTagName('div');
        var open     = document.getElementById('debugbar_open');
        var close    = document.getElementById('debugbar_close').children[0];
        var trace    = document.getElementById('debugbar_tab');
        open.onclick = function(){
            trace.style.display = 'block';
            this.style.display = 'none';
            close.parentNode.style.display = 'block';

        }
        close.onclick = function(){
            trace.style.display = 'none';
            this.parentNode.style.display = 'none';
            open.style.display = 'block';
        }
        for(var i = 0; i < tab_tit.length; i++){
            tab_tit[i].onclick = (function(i){
                return function(){
                    for(var j = 0; j < tab_cont.length; j++){
                        tab_cont[j].style.display = 'none';
                        tab_tit[j].style.color = '#999';
                    }
                    tab_cont[i].style.display = 'block';
                    tab_tit[i].style.color = '#000';
                }
            })(i)
        }
    })();
</script>
