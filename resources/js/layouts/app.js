class AppLayout {
    constructor() {
        this.handleLogout()
    }

    handleLogout() {
        $(document).ready(function () {
            $('#logout-btn').click(function () {
                let url       = '/logout'
                let csrfToken = $('#logout-btn').data('csrfToken')

                $.ajax({
                    url : url,
                    type: "POST",
                    data: {
                        '_token': csrfToken
                    }
                }).then(function () {
                    location.reload()
                })
            })
        })
    }
}

export default new AppLayout()
