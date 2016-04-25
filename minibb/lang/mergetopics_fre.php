<?php
/*
FRENCH language pack for merge topics addon for miniBB.
Copyright (C) 2006-2008 Paul Puzyrev www.minibb.net

This file is part of miniBB. miniBB is free discussion forums/message board software, without any warranty. See COPYING file for more details. www.minibb.net
Revised by Patrick Allaire, 2015-01-16
Converted into UTF-8
*/

$l_mergeTopic='Fusionner des fils de discussion (sujets)';
$l_mergeNa='Le fil à fusionné n`a pas été choisi';
$l_mergeTopicId='<b>ID du fil</b>';
$l_mergedTopic='Indiquez l`ID du fil à fusionner avec celui déjà choisi plus haut.<br />(au besoin, ouvrez le sujet dans une nouvelle fenêtre de votre navigateur et observez bien l`adresse de la page. Vous trouverez l`ID du fil après le mot "topic" (par exemple, le fil 12345 dans  <b>...&amp;topic=<u>12345</u>&amp;...</b>; )Si vous utilisez le mode "rewrite", le numéro du fil se trouvera au second rang des nombre, comme le 17 dans  <b>1_17_0.html</b> - topic ID is 17) <br /><br />Explication: il n`a jamais de message orphelin, mais tous doivent être rattachés à un sujet (d`ou l`expression française utilisée ici: <i>fil de discussion</i>, car un fil les unit tous). C`est ce fil que vous devez mentionner ci-haut.  Il prend la forme d`un numéro (ID), le numéro du sujet. Le titre du fil fusionné sera répété dans tous les messages de ce fil, en première ligne. <strong>ATTENTION: il n`est possible de fusionner des fils qu`en ordre chronologique. C`èst la date du premier sujet qui fait foi de tout.Ainsi, vous ne pourrez fusionné le fil A au B que si le premier message de A est plus RÉCENT que le dernier message du fil B!</strong>';

$l_mergeWarn='Nous n`arrivons pas à réaliser la fusion demandée.  Il semble qu`un des éléments n`existe pas. Veuillez vérifier les ID indiqués et recommencer.';
$l_mergedOk='Les messages ont été fusionnés.  Voici combien ils étaient : ';
$l_mergeTitle='La phrase suivante a été inscrite dans les messages fusionnés: ';
$l_viewMergedTopic='Voir le nouveau sujet fusionné';
$l_checkOldTopic='Vérifier le vieux sujet (avant fusion)';

$l_mergeError='Les fils ne peuvent être fusionnés, car son premier message est plus récent que le dernier message du sujet destination.Cette restriction est imposée afin d`éviter de désagréables surprises dans la chronologie d`un éventuel nouveau fil fusionné.Il vaut peut-être mieux de simplement éliminer certains messages d`un des deux fils afin de rendre compatibles les deux fils en vue d`une fusion.Assurez-vous alors que le plus ancien message du fil à fusionner est plus récent que le dernier message de l`autre fil.';

?>