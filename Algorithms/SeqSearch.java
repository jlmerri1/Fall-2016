//searching algorithms
import java.util.*;
public class SeqSearch
{
   public static void main(String [] args)
   {
      int [] array = {10,20,5, 3, 17, 14, 25};
      int [] sortedArray = {3, 5, 10, 14, 17, 20, 25};
      System.out.println("The original array is " + Arrays.toString(array));
      
      System.out.println(linearSearch(array, 17));
      System.out.println(binarySearch(array, 17));
   }
   
   public static boolean linearSearch(int [] numArray, int value)
   {
      for(int i = 0; i < numArray.length; i++)
      
         if(numArray[i] == value)
            return true;
      
      
      return false;
   }
   
   //binary search
   public static boolean binarySearch(int [] numArray, int value)
   {
      //return binarySearchRec(numArray,value, 0, numArray.length - 1);
      return binarySearchIter(numArray, value);
   }
   
   // recursive helper method for binary search
   public static boolean binarySearchRec(int [] numArray, int value, int first, int last)
   {
      if (first > last)
         return false;
      
      int mid = (first + last) / 2;
      
      if (value < numArray[mid])
         return binarySearchRec(numArray, value, first, mid-1);
      else if (value > numArray[mid])
         return binarySearchRec(numArray, value, mid + 1, last);
      else
         return true;
   }
   
   //iterative helper method for binaySearch
   public static boolean binarySearchIter(int [] numArray, int value)
   {
      int n = numArray.length;
      int low = 0;
      int high = n - 1;
      
      while(low <= high)
      {
         int mid = (low + high) / 2;
         
         if(value < numArray[mid])
            high = mid - 1;
            
         else if (value > numArray[mid])
            low = mid + 1;
         
         else
            return true;
      }
      
      return false;
   }
}