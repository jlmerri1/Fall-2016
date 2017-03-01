//
//  vastas.swift
//  Anatomy
//
//  Created by Jason Merrill on 12/14/16.
//  Copyright © 2016 Big Nerd Ranch. All rights reserved.
//

import UIKit
class vastasController: UIViewController {
    
    override func viewDidLoad() {
        super.viewDidLoad()
    }
    
    @IBAction func wrongAnswer(sender:AnyObject)
    {
        let alertController = UIAlertController(title: "Wrong!", message: "Please try again!", preferredStyle: .alert)
        
        let OKAction = UIAlertAction(title: "OK", style: .default) { action in
            // ...
        }
        alertController.addAction(OKAction)
        
        self.present(alertController, animated: true) {
            // ...
        }
        
    }
    
    
    @IBAction func rightAnswer(sender:AnyObject){
        
        let alertController = UIAlertController(title: "HOORAY \n\n\n\n You are correct!!", message: "Good job!", preferredStyle: .alert)
        
        let OKAction = UIAlertAction(title: "Next", style: .default) { action in
            // ...
            self.performSegue(withIdentifier: "ok", sender: self)
        }
        alertController.addAction(OKAction)
        
        self.present(alertController, animated: true) {
            // ...
        }
    }
    
}

