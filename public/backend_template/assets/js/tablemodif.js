/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    var element = $('#tasktable tbody tr');
    element.has('td.New').addClass('danger');
    element.has('td.Process').addClass('active');
    element.has('td.Need').addClass('info');
    element.has('td.Revision').addClass('warning');
    element.has('td.Done').addClass('success');
