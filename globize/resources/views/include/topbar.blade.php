<style>
    #alarm_count {
        width:15px;
        height:15px;
        line-height:normal;
    }
</style>
<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
    <div class="m-stack__item m-topbar__nav-wrapper">
        <ul class="m-topbar__nav m-nav m-nav--inline">
        <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click"
            m-dropdown-persistent="1" id="noti_container">
            <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger" id="alarm_count" data-count="0"></span>
                <span class="m-nav__link-icon"><i class="flaticon-alarm"></i></span>
            </a>
            <div class="m-dropdown__wrapper" id="noti-wrapper">
                <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                <div class="m-dropdown__inner">
                    <div class="m-dropdown__header m--align-center" style="background: url({{ asset('img/notification_bg.jpg')}}); background-size: cover;">
                        <span class="m-dropdown__header-title" id="top_noti_count"></span>
                        <span class="m-dropdown__header-subtitle">User Notifications</span>
                    </div>
                    <div class="m-dropdown__body">
                        <div class="m-dropdown__content">
                            <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                        Alerts
                                    </a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">Events</a>
                                </li>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">Logs</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                    <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                            <div class="m-list-timeline__items" id="noti-items">
                                                <!-- <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                    <span class="m-list-timeline__text"><img src="{{ asset('img/user.jpg') }}" style="width:32px;height:32px;"> Friend Invite<i class="socicon-facebook"></i></span>
                                                    <span class="m-list-timeline__time">Just now</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge"></span>
                                                    <span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                                    <span class="m-list-timeline__time">14 mins</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge"></span>
                                                    <span class="m-list-timeline__text">New invoice received</span>
                                                    <span class="m-list-timeline__time">20 mins</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge"></span>
                                                    <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                                    <span class="m-list-timeline__time">1 hr</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge"></span>
                                                    <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                                                    <span class="m-list-timeline__time">2 hrs</span>
                                                </div>
                                                <div class="m-list-timeline__item m-list-timeline__item--read">
                                                    <span class="m-list-timeline__badge"></span>
                                                    <span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                                    <span class="m-list-timeline__time">7 hrs</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                    <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                            <div class="m-list-timeline__items">
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                    <a href="" class="m-list-timeline__text">New order received</a>
                                                    <span class="m-list-timeline__time">Just now</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                    <a href="" class="m-list-timeline__text">New invoice received</a>
                                                    <span class="m-list-timeline__time">20 mins</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                    <a href="" class="m-list-timeline__text">Production server up</a>
                                                    <span class="m-list-timeline__time">5 hrs</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                    <a href="" class="m-list-timeline__text">New order received</a>
                                                    <span class="m-list-timeline__time">7 hrs</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                    <a href="" class="m-list-timeline__text">System shutdown</a>
                                                    <span class="m-list-timeline__time">11 mins</span>
                                                </div>
                                                <div class="m-list-timeline__item">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                    <a href="" class="m-list-timeline__text">Production server down</a>
                                                    <span class="m-list-timeline__time">3 hrs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                    <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                        <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                            <span class="">All caught up!<br>No new logs.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </li>
            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                m-dropdown-toggle="click">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-topbar__userpic">
                        <img src="{{ asset('img/user.jpg')}}" class="m--img-rounded m--marginless" alt=""/>
                    </span>
                    <span class="m-topbar__username m--hide">Nick</span>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                        <div class="m-dropdown__header m--align-center" style="background: url({{ asset('img/user_profile_bg.jpg')}}); background-size: cover;">
                            <div class="m-card-user m-card-user--skin-dark">
                                <div class="m-card-user__pic">
                                    <img src="{{ asset('img/user.jpg')}}" class="m--img-rounded m--marginless" alt="" />
                                </div>
                                <div class="m-card-user__details">
                                    <span class="m-card-user__name m--font-weight-500">Mark Andre</span>
                                    <a href="" class="m-card-user__email m--font-weight-300 m-link">mark.andre@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="m-dropdown__body">
                            <div class="m-dropdown__content">
                                <ul class="m-nav m-nav--skin-light">
                                    
                                    <li class="m-nav__item">                                                              
                                        <a href="#" class="btn m-btn--pill  btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="icon-key"></i> Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

