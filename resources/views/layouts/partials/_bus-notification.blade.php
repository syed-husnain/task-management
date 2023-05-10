<li class="nav-item dropdown" id="notification">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fa fa-bell fa-2x"></i>
        <small style="left: 37px;top: 3px;position: absolute;" class="count-notification">
            0
        </small>
    </a>
    <style>
        @media only screen
            and (min-width: 320px)
            and (max-width: 767px) {

                .dropdown-menu.dropdown-menu-right {
                min-width: 300px !important;
                right: -101px;
            }

        }

        #notification-append a {
            width: 100%;
            float: left;
            padding: 6px 15px;
            min-height: auto;
            text-decoration: none;
            color: #333;
        }
        #notification-append a span {
            float: right;
            color: #d7d1d1;
        }
        #notification-append a.unread {
            background: #fbfbfb;
        }
    </style>
    <div class="dropdown-menu dropdown-menu-right" style="min-width: 400px;"
         aria-labelledby="navbarDropdown">
        <div id="notification-append">
            <a href="#">No Notifications</a>
        </div>

        <div class="text-center">
            <a href="#" onclick="markAllAsRead(this)" class="dropdown-item append-url pull-left d-none">
                Mark All as Read
            </a>
            <a href="{{ route('bus-notification.index') }}" class="dropdown-item append-url pull-right">
                See All
            </a>
        </div>
    </div>
</li>

<script>

    const recentNotificationURL = '{{ route('bus-notification.recent-ajax') }}';
    const markAllNotificationURL = '{{ route('bus-notification.mark-all-ajax') }}';
    const readNotificationURL = '{{ route('bus-notification.read-ajax', ':id') }}';

    function markAllAsRead(el) {

        el.onclick = e => {
            e.preventDefault();
        }

        $('#notification a.pull-left').text('Please Wait...');

        fetch(markAllNotificationURL, {
            method: 'post',
            headers: {
                'X-CSRF-TOKEN':"{{ csrf_token()}}"
            }
        })
            .then((response) => response.json())
            .then((data) => {
                $('#notification a.pull-left').text('Mark All as Read');
            })
            .catch(error => {
                console.log(error);
            });
    }

    fetch(recentNotificationURL, {
        method: 'post',
        headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
    })
        .then((response) => response.json())
        .then((data) => {
            $('#notification a small').text(data.unread);

            if (!data.recent.length) {
                return false;
            }

            const notiAppend = $('#notification #notification-append');
            notiAppend.empty();
            $('#notification a.pull-left').removeClass('d-none');

            data.recent.forEach((value, index) => {

                let readClass = 'unread';

                if (value.read_at)
                    readClass = 'read';

                notiAppend.append('<a class="' + readClass + '"' +
                    ' href="' + value.route + '"' +
                    ' data-toggle="tooltip"' +
                    ' title="' + value.tip + '"' +
                    ' data-id="' + value.id + '">' +
                    value.label +
                    '<span>' + value.created + '</span>' +
                    '</a>');
            });
        })
        .then(() => {
            document.querySelectorAll('#notification #notification-append a').forEach((el, index) => {
                el.onclick = (e) => {
                    e.preventDefault()
                    fetch(readNotificationURL.replace(':id', el.getAttribute('data-id')), {
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN':"{{csrf_token()}}"
                        }
                    })
                        .then(res => {
                            window.location = el.href;
                        })
                }
            });
        })
        .catch(error => {
            console.log(error);
        });
</script>
