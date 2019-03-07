<?php 
  /*
   * Funkcja oparta o phpBB, tworzy liste stron na podstawie parametrow
   * - $base_url - URL
   * - $num_items - liczba pozycji
   * - $per_page - ilosc pozycji na strone
   * - $start_item - pozycja poczatkowa
   * - $add_prevnext_text - czy wyswietlac etykiety nastepny, poprzedni (TODO: obsluga tegoz parametru)
   */
  function pagination($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = true)
  {
      $seperator = ' ';
 
      $total_pages = ceil($num_items/$per_page); // ilość stron
 
      $amp = strpos($base_url, '?') !== false ? '&amp;' : '?'; // czy łączyć "?" czy "&"
      if ($total_pages == 1 || !$num_items) // ilość elementów = 1?
      {
          if ($start_item % $per_page == 0)
          {
              return '<b>1</b>'; // 1 strona bez linka
          }
          else
          {
              return ($add_prevnext_text? '<a href="'. $base_url . $amp . 'start=0">&lt;&lt;</a>' . $seperator:'') . '<b>1</b>'; // 1 strona z linkiem do poczatku (<<)- zaczeto nierówno z iloscia postow na strone (1 user ma 10/str, inny ma 15 i daje linka temu pierwszemu)
          }
      }
 
      $on_page = floor($start_item / $per_page) + 1; // ilosc na strone
      $page_string = ($add_prevnext_text && $on_page!=1 || $start_item % $per_page != 0) ? '<a href="'. $base_url . $amp . 'start=' . max(0,($on_page-2)*$per_page) . '">&lt;&lt;</a>'.$seperator : ''; // poczatkowy << (o ile jestesmy dalej niz na 1 stronie)
 
      if ($total_pages>10) // wiecej niz 10 stron
      {
          for($i = 1; $i <= 3; $i++) // poczatkowe 3 strony wyswietlane zawsze
          {
              $page_string .= ($i == $on_page) ? '<b>' . $i . '</b>' : '<a href="' . $base_url . $amp . "start=" . (($i - 1) * $per_page) . '">' . $i . '</a>';
              $page_string .= $seperator;
          }
 
          $start1=max(4,floor($on_page/2)-1); // ustalenie poczatku i konca 2 czesci ( 3 ... [tutaj] ... srodek ... ... koniec)
          $end1=max(4,min($total_pages-3,floor($on_page/2)+1));
 
          $start2=max($end1+1,min($total_pages-6,max(4,$on_page-4))); // ustalenie poczatku i konca 3 czesci ( 3 ... ... ... [tutaj] ... ... koniec)
          $end2=max(6,min($total_pages-3,$on_page+4));
 
          $start3=max($end2+1,min($total_pages-3,floor($on_page+($total_pages-$on_page)/2)-2));  // ustalenie poczatku i konca 4 czesci ( 3 ... ... ...  ... ... [tutaj] ... koniec)
          $end3=min($total_pages-3,max(4,floor($on_page+($total_pages-$on_page)/2)));
 
          if ($start1>4)
          {
              $page_string .= '...' . $seperator; // jesli 2 czesc sie zaczyna dalej niz na 4 stronie
          }
          if ($start2>=$end1) // jesli 2 czesc w ogole istnieje
          for($i = $start1; $i <= $end1; $i++)
          {
              $page_string .= ($i == $on_page) ? '<b>' . $i . '</b>' : '<a href="' . $base_url . $amp . "start=" . (($i - 1) * $per_page) . '">' . $i . '</a>';
              $page_string .= $seperator;
          }
          if ($start2-$end1>1) // jesli 2 czesc jest przynajmniej o 1 odlegla od nastepnej
          {
              $page_string .= '...' . $seperator;
          }
          for($i = $start2; $i <= $end2; $i++) // srodkowa czesc
          {
              $page_string .= ($i == $on_page) ? '<b>' . $i . '</b>' : '<a href="' . $base_url . $amp . "start=" . (($i - 1) * $per_page) . '">' . $i . '</a>';
              $page_string .= $seperator;
          }
 
          if ($start3-$end2>1) // jesli 4 czesc jest przynajmniej o 1 odlegla od nastepnej
          {
              $page_string .= '...' . $seperator;
          }
          for($i = $start3; $i <= $end3; $i++) // 4 czesc
          {
              $page_string .= ($i == $on_page) ? '<b>' . $i . '</b>' : '<a href="' . $base_url . $amp . "start=" . (($i - 1) * $per_page) . '">' . $i . '</a>';
              $page_string .= $seperator;
          }
 
          if ($end2<$total_pages-3) // jesli ostatnia czesc jest konczy sie na wiecej niz 3 strony od konca
          {
              $page_string .= '...' . $seperator;
          }
 
          for($i = $total_pages-2; $i <= $total_pages; $i++) // koncowe strony
          {
              $page_string .= ($i == $on_page) ? '<b>' . $i . '</b>' : '<a href="' . $base_url . $amp . "start=" . (($i - 1) * $per_page) . '">' . $i . '</a>';
              if ($i < $total_pages)
              {
                  $page_string .= $seperator;
              }
          }
      }
      else // mniej niz 10 sttron - wyswietlamy cala liste
      {
          for($i = 1; $i <= $total_pages; $i++)
          {
              $page_string .= ($i == $on_page) ? '<b>' . $i . '</b>' : '<a href="' . $base_url . $amp . "start=" . (($i - 1) * $per_page) . '">' . $i . '</a>';
              if ($i < $total_pages)
              {
                  $page_string .= $seperator;
              }
          }
      } // dodanie koncowej >>, jesli nie jestesmy na ostatniej stronie
      $page_string .= ($on_page == $total_pages || !$add_prevnext_text) ?'': $seperator.'<a href="'. $base_url . $amp . 'start='.$on_page*$per_page . '">&gt;&gt;</a>';
 
      return $page_string;
  }
  
  
  function pobierz_numer_strony(){
	$numer = (int)$_GET['start'];
  	if(is_int($numer)){
		$paginacja = $numer;
	}else{
		$paginacja = 0;
	}  
	return $paginacja;
  }
?>