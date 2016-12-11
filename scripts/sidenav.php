<script>
/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("sidenavigation").style.width = "55vw";
	document.getElementById("sidenavigation").style.borderRightStyle = "solid";
	document.getElementById("sidenavigation").style.overflow ="scroll";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("sidenavigation").style.width = "0";
	document.getElementById("sidenavigation").style.borderRightStyle = "hidden";
	document.getElementById("sidenavigation").style.overflow ="hidden";
}
</script>