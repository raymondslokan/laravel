<?php

  function showHelpBlocks()
  {
    if(!session('showHelpBlocks'))
      return "<style>.help-block { display:none; }</style>";
  }
