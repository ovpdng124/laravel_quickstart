class List {
    constructor() {
        let thisClass = this

        $(document).ready(function () {
            thisClass.config()
            thisClass.listen()
        })
    }

    config() {
        this.elements = {
            'deleteTaskBtn': $('.delete-task-btn')
        }
    }

    listen() {
        this.handleDeleteTask()
    }

    handleDeleteTask() {
        this.elements.deleteTaskBtn.click(function () {
            let confirmed = confirm('Confirm delete')

            if (confirmed) {
                let csrfToken = $(this).data('csrfToken')
                let taskId    = $(this).data('taskId')
                let url       = `/tasks/${taskId}`

                $.ajax({
                    type: 'DELETE',
                    url : url,
                    data: {
                        '_token': csrfToken,
                        'id'    : taskId
                    }
                }).then(function (res) {
                    alert(res)

                    location.reload()
                })
            }
        })
    }
}

export default new List()
