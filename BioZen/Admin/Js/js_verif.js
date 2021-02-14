/**Connextion Administrateur ****/

function verficationAdminLog() {

    var mailAdmin = $("#mailAdmin").val();
    var mdpAdmin = $("#mdpAdmin").val();

    if (mailAdmin != '') {
        if (mdpAdmin != '') {
            if (expressionsReguliereMail(mailAdmin)) {
                if (expressionsReguliereMotDePasse(mdpAdmin)) {
                    return true;
                } else {
                    messageErruer('#messageA', '#mdpAdmin')
                    return false;
                }
            } else {
                messageErruer('#messageA', '#mailAdmin')
                return false;
            }

        } else {
            messageErruer('#messageA', '#mdpAdmin')
            return false;
        }

    } else {
        messageErruer('#messageA', '#mailAdmin')
        return false;
    }

}