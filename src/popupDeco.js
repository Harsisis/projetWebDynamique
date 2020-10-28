function deco() {
    if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")){
        location.href = ("session/seDeconnecter.php");
    }
    else{
        return false;
    }
}