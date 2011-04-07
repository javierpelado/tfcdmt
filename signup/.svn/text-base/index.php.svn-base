<?php include '../header.php';?>

<script id="demo" type="text/javascript">
    $(document).ready(function() {
        // validate signup form on keyup and submit
        var validator = $("#signupform").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 2,
                    remote: "users.php"
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    remote: "emails.php"
                },
                dateformat: "required",
                terms: "required"
            },
            messages: {
                firstname: "Introduce tu nombre",
                lastname: "Introduce tus apellidos",
                username: {
                    required: "Introduce un nombre de usuario",
                    minlength: jQuery.format("Introduce {0} caracteres como m&iacute;nimo"),
                    remote: jQuery.format("{0} ya est&aacute; en uso")
                },
                password: {
                    required: "Elige una contrase&ntilde;a",
                    minlength: jQuery.format("Introduce {0} caracteres como m&iacute;nimo")
                },
                password_confirm: {
                    required: "Repite la contrase&ntilde;a",
                    minlength: jQuery.format("Introduce {0} caracteres como m&iacute;nimo"),
                    equalTo: "Las contrase&ntilde;as deben coincidir"
                },
                email: {
                    required: "Por favor, introduce una direcci&oacute;n de email v&aacute;lida",
                    minlength: "Por favor, introduce una direcci&oacute;n de email v&aacute;lida",
                    remote: jQuery.format("{0} ya est&aacute; en uso")
                },
                dateformat: "Elige el formato de fecha que prefieres",
                terms: " "
            },
            // the errorPlacement has to take the table layout into account
            errorPlacement: function(error, element) {
                if ( element.is(":radio") )
                    error.appendTo( element.parent().next().next() );
                else if ( element.is(":checkbox") )
                    error.appendTo ( element.next() );
                else
                    error.appendTo( element.parent().next() );
            },
            // specifying a submitHandler prevents the default submit, good for the demo
            submitHandler: function() {
                //			alert("¡Enviado!");
                ("#signupform").submit();
            },
            // set this class to error-labels to indicate valid fields
            success: function(label) {
                // set &nbsp; as text for IE
                label.html("&nbsp;").addClass("checked");
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

    });

    var blueTitle = new blueTitle('Registrarse');
</script>




<div id="content">

    <div style="clear: both;"><div></div></div>


    <div class="content">
        <div id="signupwrap">
            <form id="signupform" autocomplete="off" method="post" action="/signup/">
                <table>
                    <tbody><tr>
                            <td class="label"><label id="lfirstname" for="firstname">Nombre</label></td>
                            <td class="field"><input id="firstname" name="firstname" type="text" class="textfield" value="<?php echo (isset($_POST['firstname']))?$_POST['firstname']:''; ?>" maxlength="100"></td>
                            <td class="status"><span id="firstnameStatus"></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label id="llastname" for="lastname">Apellido</label></td>
                            <td class="field"><input id="lastname" name="lastname" type="text" class="textfield" value="<?php echo (isset($_POST['lastname']))?$_POST['lastname']:''; ?>" maxlength="100"></td>
                            <td class="status"><span id="lastnameStatus"></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label id="lusername" for="username">Usuario</label></td>
                            <td class="field"><input id="username" name="username" type="text" class="textfield" value="<?php echo (isset($_POST['username']))?$_POST['username']:''; ?>" maxlength="50"></td>
                            <td class="status"><span id="usernameStatus"></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label id="lpassword" for="password">Contrase&ntilde;a</label></td>
                            <td class="field"><input id="password" name="password" type="password" class="textfield" maxlength="64" value="<?php echo (isset($_POST['password']))?$_POST['password']:''; ?>"></td>
                            <td class="status"><span id="firstPasswordStatus"></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label id="lpassword_confirm" for="password_confirm">Confirmar Contrase&ntilde;a</label></td>
                            <td class="field"><input id="password_confirm" name="password_confirm" type="password" class="textfield" maxlength="64" value="<?php echo (isset($_POST['password_confirm']))?$_POST['password_confirm']:''; ?>"></td>
                            <td class="status"><span id="passwordStatus"></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label id="lemail" for="email">Direcci&oacute;n de correo electr&oacute;nico</label></td>
                            <td class="field"><input id="email" name="email" type="text" value="<?php echo (isset($_POST['email']))?$_POST['email']:''; ?>" class="textfield" maxlength="150"></td>
                            <td class="status"><span id="emailStatus"></span></td>
                        </tr>
                        <tr>
                            <td class="label"><label>&iquest;Cu&aacute;l es el correcto?</label></td>
                            <td class="field" colspan="2" style="vertical-align: top; padding-top: 2px;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="padding-right: 5px;">
                                                <input id="dateformat_eu" name="dateformat" type="radio" value="0">
                                                <label id="ldateformat_eu" for="dateformat_eu">14/02/07</label>
                                            </td>
                                            <td style="padding-left: 5px;">
                                                <input id="dateformat_am" name="dateformat" type="radio" value="1">
                                                <label id="ldateformat_am" for="dateformat_am">02/14/07</label>
                                            </td>
                                            <td>
                                                <span id="dateformatStatus"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">&nbsp;</td>
                            <td class="field" colspan="2">
                                <div id="termswrap">
                                    <input id="terms" type="checkbox" name="terms">
                                    <label id="lterms" for="terms">He le&iacute;do y acepto <a onclick="window.open('/help/terms.rtm','TOS','status=yes,scrollbars=yes,resizable=yes,width=800,height=480'); return false;" href="/help/terms.rtm">los t&eacute;rminos y condiciones de uso</a>.<span id="termsStatus"></span></label>
                                </div> <!-- /termswrap -->
                            </td>
                        </tr>
                        <tr>
                            <td class="label"><label id="lsignupsubmit" for="signupsubmit">Registrarse</label></td>
                            <td class="field" colspan="2">
                                <input id="signupsubmit" name="submit" type="submit" value="Registrarse">
                            </td>
                        </tr>
                    </tbody></table>
                <input type="hidden" name="language" id="language" value="es">
            </form>
        </div>

    </div>
</div>

</div>

</body>
</html>