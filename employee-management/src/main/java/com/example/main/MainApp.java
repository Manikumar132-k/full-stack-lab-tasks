package com.example.main;

import com.example.config.AppConfig;
import com.example.model.Employee;
import com.example.service.EmployeeService;
import org.springframework.beans.factory.BeanFactory;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;

public class MainApp {
	public static void main(String[] args) {

        BeanFactory factory = new AnnotationConfigApplicationContext(AppConfig.class);

        EmployeeService service = factory.getBean(EmployeeService.class);

        service.addEmployee(new Employee(1, "Mani"));
        service.addEmployee(new Employee(2, "Kumar"));

        service.displayEmployees();
    }

}
