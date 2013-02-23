<?php
$cacheKey = $modx->getOption('cacheKey', $scriptProperties);

if (empty($cacheKey) || !$output = $modx->cacheManager->get('tickets/latest.'.$cacheKey)) {
	$action = $modx->getOption('action', $scriptProperties, 'comments');
	if (empty($action)) {$action = 'comments';}

	$Tickets = $modx->getService('tickets','Tickets',$modx->getOption('tickets.core_path',null,$modx->getOption('core_path').'components/tickets/').'model/tickets/',$scriptProperties);
    $pdoFetch = $modx->getService('pdofetch','pdoFetch',$modx->getOption('pdotools.core_path',null,$modx->getOption('core_path').'components/pdotools/').'model/pdotools/',$scriptProperties);
    if (!($Tickets instanceof Tickets)) return '';

	switch($action) {
		case 'comments': $output = $Tickets->getLatestComments($scriptProperties); break;
		case 'tickets':
            $where = array();
        	if ($parents = $scriptProperties['parents']) {
    			if (!is_array($parents)) {
    				$parents = explode(',', $parents);
    			}
    			$where['parent:IN'] = $parents;
    		}
    
    		$where['class_key'] = 'Ticket';
    		$where['published'] = 1;
    		$where['deleted'] = 0;
            
            $default = array(
                'class' => 'Ticket'
            	,'where' => json_encode($where)
            	,'leftJoin' => '[
            		{"class":"TicketView","alias":"View","on":"Ticket.id=View.parent"}
            		,{"class":"TicketView","alias":"LastView","on":"Ticket.id=LastView.parent AND LastView.uid = '.$modx->user->id.'"}
            		,{"class":"TicketVote","alias":"Vote","on":"Ticket.id=Vote.parent AND Vote.class=\'Ticket\'"}
            		,{"class":"TicketThread","alias":"Thread","on":"Thread.resource=Ticket.id"}
            		,{"class":"TicketComment","alias":"Comment","on":"Comment.thread=Thread.id"}
            		,{"class":"TicketsSection","alias":"Section","on":"Section.id=Ticket.parent"}
            		,{"class":"modUser","alias":"User","on":"User.id=Ticket.createdby"}
            		,{"class":"modUserProfile","alias":"Profile","on":"Profile.internalKey=User.id"}
            	]'
            	,'select' => '{
            		"Ticket":"all"
            		,"Vote":"SUM(Vote.value) AS votes"
            		,"View":"COUNT(DISTINCT View.uid) as views"
            		,"LastView":"LastView.timestamp as new_comments"
            		,"Comment":"COUNT(DISTINCT Comment.id) as comments"
            		,"Section":"Section.pagetitle as section_name, Section.uri as section_uri"
            		,"User":"User.username"
            		,"Profile":"Profile.fullname"
            	}'
            	,'groupby' => 'Ticket.id'
            	,'sortby' => 'createdon'
            	,'sortdir' => 'desc'
            	,'fastMode' => false
            	,'return' => 'data'
            );
            $pdoFetch->config = array_merge($pdoFetch->config, $default, $scriptProperties);
            $rows = $pdoFetch->run();

    		if (count($rows)) {
    			foreach ($rows as $v) {
    				$v['sectiontitle'] = $v['section_name'];
    				$v['date_ago'] = $Tickets->dateFormat($v['createdon']);
                    $v['name'] = $v['fullname'];
    				if (empty($scriptProperties['tpl'])) {
    					$output .= '<pre>'.print_r($v,true).'</pre>';
    				}
    				else {
    					$output .= $modx->getChunk($scriptProperties['tpl'], $v);
    				}
    			}
    		}
            break;
		default: $output = '';
	}

	if (!empty($cacheKey)) {
		$modx->cacheManager->set('tickets/latest.'.$cacheKey, $output, 1800);
	}
}

if (!empty($toPlaceholder)) {
	$modx->setPlaceholder($toPlaceholder, $output);
}
else {
	return $output;
}
