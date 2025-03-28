async function search() {
    const searchInput = document.getElementById('search_input');
    const s = searchInput.value;
    const res = await fetch('search.php?search=' + s);
    const data = await res.text();
    const table = document.getElementById("user_table_body");
    table.innerHTML = data;
}

// CHAT BOOT MESSENGER////////////////////////


$(document).ready(function(){
    $(".chat_on").click(function(){
        $(".Layout").toggle();
        $(".chat_on").hide(300);
    });
    
       $(".chat_close_icon").click(function(){
        $(".Layout").hide();
           $(".chat_on").show(300);
    });
    
});