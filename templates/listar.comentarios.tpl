<div class="row">
    <p>Hola los comentarios</p>
   <div class="col-12">
     <div>
         <ul>
            {*foreach from=$comentarios item=comen*}
                <li>{*$comen->mensaje*}</li>
            {*/foreach*}
         </ul>
     </div>
</div>