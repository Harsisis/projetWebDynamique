function deco() {
    if (confirm("Etes-vous sûr de vouloir vous déconnecter ?")){
        location.href = ("session/seDeconnecter.php");
    }
    else{
        return false;
    }
}