<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<!--
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>-->
			<a class="brand" href="/"><img src="/static/img/logo.png" alt="logo"/><span style="display:none;">오답노트</span></a>
			<div class="nav-no-collapse header-nav">
				<form id="global-search" class="navbar-search pull-left">
					<input type="text" class="search-query" placeholder="수능에 대한 주제를 검색하세요" />
					<input type="hidden" class="search-tagid" />
					<input type="hidden" class="search-subject" />
				</form>
				<ul class="nav pull-right">
					<li class="navbar-tagmap">
						<a href="#" class="btn tagmap">
							<div class="btn-tagmap"><i class="fa-icon-tags"></i> <span>태그맵</span></div>
						</a>
					</li>
				<?php if ($this->odab_user->get('id')): ?>
					<!--<li><a class="btn" href="#"><i class="halflings-icon white wrench"></i></a></li>-->
					<li class="dropdown">
						<a class="btn dropdown-toggle header-btn-user" data-id="<?=$this->odab_user->get('id');?>" data-toggle="dropdown" href="#">
							<img src="<?php echo $this->odab_user->get_profile_image(); ?>" class="user-profile">
							<span class="user-name"><?=$this->odab_user->get('nickname');?> 님</span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/<?php echo $this->odab_user->get('mypage_url'); ?>"><i class="fa-icon-user"></i> 마이페이지</a></li>
							<li><a href="/faq"><i class="fa-icon-question-sign"></i> 도움말</a></li>
							<li><a href="/logout"><i class="fa-icon-off"></i> 로그아웃</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li class="gnb-header">
						<a href="/login" class="gnb-login" data-fancybox-type="ajax">로그인</a>
					</li>
					<li class="gnb-header">
						<a href="/signup" class="gnb-register" data-fancybox-type="ajax">회원가입</a>
					</li>
				<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>