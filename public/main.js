
window.onload = () => {

    // -------------------- no account -----------------------

    var noloc = document.getElementById('noloc');
    if(noloc){
    noloc.onclick = nolocalert;
    function nolocalert(){
        alert("You do not have a Line of Control account. Call +1-(877)-328-4495 to open one");
    }
}

    var nocrb = document.getElementById('nocrb');
    if(nocrb){
    nocrb.onclick = nocrbAlert;
    function nocrbAlert(){
        alert("You do not have a Credit Rebuilder account. Call +1-(877)-328-4495 to open one");
    }
}

    var noscrd = document.getElementById("noscrd");
    if(noscrd){
    noscrd.onclick = noscrdAlert;
    function noscrdAlert(){
        alert("You do not have a Secured Card account. Call +1-(877)-328-4495 to open one");
    }
}

    var noloan = document.getElementById("noloan");
    if(noloan){
    noloan.onclick = noloanalert;
    function noloanalert(){
        alert("You do not have a Loan account. Call +1-(877)-328-4495 to open one");
    }
}

    var clienttable = document.getElementById("clients");
    clienttable.style.display = "flex";
    var clients = document.getElementById("client-btn");
    clients.style.background = "white";

    // ---------------- Sections -------------------

    var loanstable = document.getElementById("loans");
    var line_of_crtable = document.getElementById("line-of-credit");
    var secured_cardstable = document.getElementById("secured-cards");
    var credit_rebuildertable = document.getElementById("credit-rebuilder");
    var moneyt_table = document.getElementById("moneyt-section");
    var admin_table = document.getElementById("admins");




    var admins = document.getElementById("admin-btn");
    admins.onclick = showAdmins;
    function showAdmins(){
        admin_table.style.display = "flex";
        clienttable.style.display = "none";
        loanstable.style.display = "none";
        line_of_crtable.style.display = "none";
        secured_cardstable.style.display = "none";
        credit_rebuildertable.style.display = "none";
        moneyt_table.style.display = "none";


        // -------- background colour ---------------

        admins.style.background = "white";
        clients.style.background = "";
        loans.style.background = "";
        linecr.style.background = "";
        scardbtn.style.background = "";
        cardrbbtn.style.background = "";
        moneyt.style.background = "";
    }




    clients.onclick = showClients;
    function showClients(){
        admin_table.style.display = "none";
        clienttable.style.display = "flex";
        loanstable.style.display = "none";
        line_of_crtable.style.display = "none";
        secured_cardstable.style.display = "none";
        credit_rebuildertable.style.display = "none";
        moneyt_table.style.display = "none";


        // -------- background colour ---------------
        admins.style.background = "";
        clients.style.background = "white";
        loans.style.background = "";
        linecr.style.background = "";
        scardbtn.style.background = "";
        cardrbbtn.style.background = "";
        moneyt.style.background = "";

    }


    var loans = document.getElementById("loan-btn");
    loans.onclick = showLoans;
    function showLoans(){
        admin_table.style.display = "none";
        clienttable.style.display = "none";
        loanstable.style.display = "flex";
        line_of_crtable.style.display = "none";
        secured_cardstable.style.display = "none";
        credit_rebuildertable.style.display = "none";
        moneyt_table.style.display = "none";

        // -------- background colour ---------------

        admins.style.background = "";
        clients.style.background = "";
        loans.style.background = "white";
        linecr.style.background = "";
        scardbtn.style.background = "";
        cardrbbtn.style.background = "";
        moneyt.style.background = "";

    }

    var linecr = document.getElementById("linecr-btn");
    linecr.onclick = showLinecr;
    function showLinecr(){
        admin_table.style.display = "none";
        loanstable.style.display = "none";
        clienttable.style.display = "none";
        line_of_crtable.style.display = "flex";
        secured_cardstable.style.display = "none";
        credit_rebuildertable.style.display = "none";
        moneyt_table.style.display = "none";

        // -------- background colour ---------------

        admins.style.background = "";
        clients.style.background = "";
        loans.style.background = "";
        linecr.style.background = "white";
        scardbtn.style.background = "";
        cardrbbtn.style.background = "";
        moneyt.style.background = "";
    }


    var scardbtn = document.getElementById("scard-btn");
    scardbtn.onclick = showScard;
    function showScard(){
        admin_table.style.display = "none";
        loanstable.style.display = "none";
        clienttable.style.display = "none";
        line_of_crtable.style.display = "none";
        secured_cardstable.style.display = "flex";
        credit_rebuildertable.style.display = "none";
        moneyt_table.style.display = "none";

        // -------- background colour ---------------

        admins.style.background = "";
        clients.style.background = "";
        loans.style.background = "";
        linecr.style.background = "";
        scardbtn.style.background = "white";
        cardrbbtn.style.background = "";
        moneyt.style.background = "";
    }

    var cardrbbtn = document.getElementById("cardrb-btn");
    cardrbbtn.onclick = showCardrb;
    function showCardrb(){
        admin_table.style.display = "none";
        loanstable.style.display = "none";
        clienttable.style.display = "none";
        line_of_crtable.style.display = "none";
        secured_cardstable.style.display = "none";
        credit_rebuildertable.style.display = "flex";
        moneyt_table.style.display = "none";

        // -------- background colour ---------------

        admins.style.background = "";
        clients.style.background = "";
        loans.style.background = "";
        linecr.style.background = "";
        scardbtn.style.background = "";
        cardrbbtn.style.background = "white";
        moneyt.style.background = "";
    }

    var moneyt = document.getElementById("moneyt-btn");
    moneyt.onclick = showMoneyt;
    function showMoneyt(){
        admin_table.style.display = "none";
        loanstable.style.display = "none";
        clienttable.style.display = "none";
        line_of_crtable.style.display = "none";
        secured_cardstable.style.display = "none";
        credit_rebuildertable.style.display = "none";
        moneyt_table.style.display = "flex";

        // -------- background colour ---------------

        admins.style.background = "";
        clients.style.background = "";
        loans.style.background = "";
        linecr.style.background = "";
        scardbtn.style.background = "";
        cardrbbtn.style.background = "";
        moneyt.style.background = "white";

    }



    var open = document.getElementById("open");
    var close = document.getElementById("close");
    var menu = document.getElementById("menu");

    open.onclick = expandMenu;
    close.onclick = closeMenu;

    function expandMenu(){
        open.style.display = "none";
        close.style.display = "block";
        menu.style.display = "flex";
    }

    function closeMenu(){
        open.style.display = "block";
        close.style.display = "none";
        menu.style.display = "none";
    }




}




