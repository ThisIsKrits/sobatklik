<script>
    $(function () {
        var table = $("#data").DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            searching: true,
            paging: true,
            pagingType: "simple_numbers",
            info: false,
            language: {
                lengthMenu: "Show _MENU_ data",
                paginate: {
                    previous: '<i class="ri-arrow-left-line"></i>',
                    next: '<i class="ri-arrow-right-line"></i>',
                },
                search: "",
                searchPlaceholder: "Cari",
            },

            dom: '<"top"i<"px-3 d-flex flex-column justify-content-start align-items-start gap-3 ms-auto flex-md-row justify-content-between align-items-md-center gap-md-0"lf>>rt<"bottom"p>',
            fnInitComplete: function () {
                var newDiv = $(
                    "<div class='d-flex justify-content-center align-items-center gap-2'></div>"
                );
                newDiv.append($(".dt-search"));
                newDiv.append(
                    '<button class="btn btn-outline-placeholder" type="button" data-bs-toggle="modal" data-bs-target="#modalFilter"><i class="ri-equalizer-2-line "></i></button>'
                );

                var dropdown = $('<div class="dropdown"></div>');
                var dropdownToggle = $('<button class="btn btn-outline-placeholder" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-list-check"></i></button>');
                var dropdownMenu = $('<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"></ul>');

                // Ambil nama kolom sebagai opsi dropdown
                var table = $("#data").DataTable();
                table.columns().header().each(function (col, index) {
                    var columnName = $(col).text().trim();
                    var checkboxId = 'checkbox-' + index;
                    var listItem = $(
                        '<li><div class="p-2 mx-2"><div class="form-check"><input class="form-check-input" type="checkbox" id="'
                         + checkboxId + '" checked><label class="form-check-label" for="' + checkboxId + '">' + columnName +
                         '</label></div></div></li>');
                    dropdownMenu.append(listItem);

                    $(document).ready(function () {
                    $('#' + checkboxId).change(function () {
                        if ($(this).is(':checked')) {
                            table.column(index).visible(true);
                        } else {
                            table.column(index).visible(false);
                        }
                    });
                    });
                });



                dropdown.append(dropdownToggle);
                dropdown.append(dropdownMenu);

                newDiv.append(dropdown);

                $(
                    "div.d-flex.flex-column.justify-content-start.align-items-start.gap-3.ms-auto.flex-md-row.justify-content-between.align-items-md-center.gap-md-0"
                ).append(newDiv);
            },
        });

            $('#filterForm').submit(function (e) {
                e.preventDefault();
                var status = $('#status').val();

                table.columns(2).search(status).draw();

                $('#modalFilter').modal('hide');
            });
    });
</script>
