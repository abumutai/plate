function showModalCreateMilestone() {
    //$('#hidden-jobId').val(jobId);
}

const form_createMilestone = document.getElementById("create-milestone-form");
$("#create-milestone-form").submit(function (e) {
    e.preventDefault();
    $("#create-milestone-modal").modal('hide');
    $.ajax({
        type: "GET",
        data: $("#create-milestone-form").serializeArray(),
        url: $("#create-milestone-form").attr('action'),
        success: function (data) {
            try {
                const responseData = JSON.parse(data);
                if (responseData[0].ResponseCode == 0)
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Milestone placed successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function () {
                        //form_createMilestone.reset();
                        location.reload();
                    });
                else
                    Swal.fire({
                        title: "Warning!",
                        text: responseData[0].ResponseMessage,
                        type: "warning",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
            } catch (err) {
                Swal.fire({
                    title: "Error!",
                    text: " Cannot place milestone",
                    type: "error",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Error!",
                text: " Cannot place milestone",
                type: "error",
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        }
    })
}).on('reset', function () {
    setTimeout(function () {
        $("#create-milestone-modal").modal('hide');
    }, 1000);
});

function showModalCreateMilestone() {
    //$('#hidden-jobId').val(jobId);
}

$("#request-milestone-form").submit(function (e) {
    e.preventDefault();
    $("#request-milestone-modal").modal('hide');
    $.ajax({
        type: "GET",
        data: $("#request-milestone-form").serializeArray(),
        url: $("#request-milestone-form").attr('action'),
        success: function (data) {
            try {
                const responseData = JSON.parse(data);//fix me please
                if (responseData[0].ResponseCode == 0)
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Milestone Requested successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function () {
                        //form_createMilestone.reset();
                        location.reload();
                    });
                else
                    Swal.fire({
                        title: "Warning!",
                        text: responseData[0].ResponseMessage,
                        type: "warning",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
            } catch (err) {
                Swal.fire({
                    title: "Error!",
                    text: " Cannot request milestone",
                    type: "error",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Critical Error!",
                text: " Cannot request milestone",
                type: "error",
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        }
    })
}).on('reset', function () {
    setTimeout(function () {
        $("#request-milestone-modal").modal('hide');
    }, 1000);
});


function onOpenViewBid(title, jobId) {
    $('#place-bid-title').html(title);
    $('#hidden-jobId').val(jobId)
}

//create bid
const form_createBid = document.getElementById("create-bid-form");
$("#create-bid-form").submit(function (e) {
    e.preventDefault();
    $("#create-bid-modal").modal('hide');

    $.ajax({
        type: "GET",
        data: $("#create-bid-form").serializeArray(),
        url: form_createBid.action,
        success: function (data) {
            form_createBid.reset();
            try {
                var responseData = JSON.parse(data);
                if (responseData.status) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Bid placed successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function () {
                        location.reload();
                    });

                } else {
                    Swal.fire({
                        title: "Bidding Failed!",
                        text: responseData.message,
                        type: "warning",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }
            } catch (err) {
                Swal.fire({
                    title: "Error!",
                    text: " Bid not placed",
                    type: "warning",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Critical System Error!",
                text: " Cannot place bid!",
                type: "error",
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        }

    });
}).on('reset', function () {
    setTimeout(function () {
        $("#create-bid-modal").modal('hide');
    }, 1000);
});

//create bid
const form_editBid = document.getElementById("edit-bid-form");
$("#edit-bid-form").submit(function (e) {
    e.preventDefault();
    $("#edit-bid-modal").modal('hide');

    $.ajax({
        type: "GET",
        data: $("#edit-bid-form").serializeArray(),
        url: form_editBid.action,
        success: function (data) {
            form_editBid.reset();
            try {
                var responseData = JSON.parse(data);
                if (responseData.status) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Bid updated successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    }).then(function () {
                        location.reload();
                    });

                } else {
                    Swal.fire({
                        title: "Update Failed",
                        text: responseData.message,
                        type: "warning",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }
            } catch (err) {
                Swal.fire({
                    title: "Error!",
                    text: " Bid not updated",
                    type: "warning",
                    confirmButtonClass: 'btn btn-primary',
                    buttonsStyling: false,
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Critical System Error!",
                text: " Cannot edit bid!",
                type: "error",
                confirmButtonClass: 'btn btn-primary',
                buttonsStyling: false,
            });
        }

    });
}).on('reset', function () {
    setTimeout(function () {
        $("#edit-bid-modal").modal('hide');
    }, 1000);
});

//deleting jobs
function deleteProject(id, route) {
    Swal.fire({
        title: 'Delete this job?',
        text: "I sure hope you know what you are doing.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                data: {
                    "id": id
                },
                url: route,
                success: function (data) {
                    try {
                        var responseData = JSON.parse(data);
                        if (responseData.status) {
                            Swal.fire({
                                type: "success",
                                title: 'Job Deleted',
                                text: 'The project has been deleted',
                                confirmButtonClass: 'btn btn-success',
                            }).then(function () {
                                location.reload();
                            })
                        } else {
                            Swal.fire({
                                title: "Delete Failed!",
                                text: responseData.message,
                                type: "warning",
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            });
                        }
                    } catch (err) {
                        Swal.fire({
                            title: "Error!",
                            text: " Unable to delete job",
                            type: "error",
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        title: "Critical System Error!",
                        text: " Unable to delete job",
                        type: "error",
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    });
                }

            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: 'Cancelled',
                text: 'project deletion cancelled',
                type: 'error',
                confirmButtonClass: 'btn btn-success',
            })
        }
    })
};


function onApprove() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            Swal.fire(
                {
                    type: "success",
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    confirmButtonClass: 'btn btn-success',
                }
            )
        }
    });
}













