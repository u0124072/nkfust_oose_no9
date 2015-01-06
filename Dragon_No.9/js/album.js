$(function(){
	// �����o���n�������å� jQuery �]��
	// �A�Ө��o $block �����פγ]�w�ʵe�ɶ�
	var $block = $('#abgneBlock'),
		$slides = $('ul.list', $block),
		_width = $block.width(),
		$li = $('li', $slides),
		_animateSpeed = 600, 
		// �[�J�p�ɾ�, �����ɶ��α���}��
		timer, _showSpeed = 3000, _stop = false;
		// ���� li �ﶵ
	var _str = '';
	for(var i=0, j=$li.length;i<j;i++){
		// �C�@�� li �����ۤv�� className = playerControl_���X
		_str += '<li class="playerControl_' + (i+1) + '"></li>';
	}
		// ���� ul �ç� li �ﶵ�[��䤤
	var $playerControl = $('<ul class="playerControl"></ul>').html(_str).appendTo($slides.parent()).css('left', function(){
		// �� .playerControl ����m������m
		return (_width - $(this).width()) / 2;
	});
	
	// �� li �[�W click �ƥ�
	var $playerControlLi = $playerControl.find('li').mouseover(function(){
		var $this = $(this);
		$this.addClass('current').siblings('.current').removeClass('current');
			clearTimeout(timer);
		// ���ʦ�m��۹��������X
		$slides.stop().animate({
			left: _width * $this.index() * -1
		}, _animateSpeed, function(){
			// ��s�i���ʨ쥿�T��m��, �̧P�_�ӱҰʭp�ɾ�
			if(!_stop) timer = setTimeout(move, _showSpeed);
		});
			return false;
	}).eq(0).mouseover().end();
		// �p�G�ƹ����J $block ��
	$block.hover(function(){
		// �����}���έp�ɾ�
		_stop = true;
		clearTimeout(timer);
	}, function(){
		// �p�G�ƹ����X $block ��
		// �}�Ҷ}���έp�ɾ�
		_stop = false;
		timer = setTimeout(move, _showSpeed);
	});
	
	// �p�ɾ��ϥ�
	function move(){
		var _index = $('.current').index();
		$playerControlLi.eq((_index + 1) % $playerControlLi.length).mouseover();
	}
});