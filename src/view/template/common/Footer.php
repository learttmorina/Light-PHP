    </div>
</div>

<!-- Console -->
<?php
if (Config::Get("debug_console")) {
    require VIEW . "template/common/Console.php";
}
?>

<br><br>

<footer class="page-footer red lighten-2" style="padding-top: 10px;">

    <div class='container'>
        <h4>Footer</h4>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Modify me:
            src/view/template/common/footer.php
        </div>
    </div>

</footer>

</body>
</html>
